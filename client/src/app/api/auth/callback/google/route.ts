import { google, lucia } from "@/auth";
// import { update } from "@/components/shared/api/userApi";
import kyInstance from "@/lib/ky";
import prisma from "@/lib/prisma";
// import streamServerClient from "@/lib/stream";
import { slugify } from "@/lib/utils";
import { Prisma } from "@prisma/client";
import { OAuth2RequestError } from "arctic";
import { generateIdFromEntropySize } from "lucia";
import { cookies } from "next/headers";
import { NextRequest } from "next/server";

type UserCreateInput = Prisma.UserCreateInput;

export async function GET(req: NextRequest) {
  const code = req.nextUrl.searchParams.get("code");
  const state = req.nextUrl.searchParams.get("state");

  const storedState = cookies().get("state")?.value;
  const storedCodeVerifier = cookies().get("code_verifier")?.value;

  if (
    !code ||
    !state ||
    !storedState ||
    !storedCodeVerifier ||
    state !== storedState
  ) {
    return new Response(null, { status: 400 });
  }

  try {
    const tokens = await google.validateAuthorizationCode(
      code,
      storedCodeVerifier,
    );

    const googleUser = await kyInstance
      .get("https://www.googleapis.com/oauth2/v1/userinfo", {
        headers: {
          Authorization: `Bearer ${tokens.accessToken}`,
        },
      })
      .json<{ id: string; name: string }>();

    const existingUser = await prisma.user.findUnique({
      where: {
        googleId: googleUser.id,
      },
    });

    if (existingUser) {
      const session = await lucia.createSession(existingUser.id, {});
      const sessionCookie = lucia.createSessionCookie(session.id);
      cookies().set(
        sessionCookie.name,
        sessionCookie.value,
        sessionCookie.attributes,
      );
      return new Response(null, {
        status: 302,
        headers: {
          Location: "/",
        },
      });
    }

    const userId = generateIdFromEntropySize(10);

    const username = slugify(googleUser.name) + "-" + userId.slice(0, 4);

    const now = new Date().toISOString(); // Thời gian hiện tại dưới định dạng ISO 8601

    const transformedUser: UserCreateInput = {
      id: userId,
      username,
      displayName: googleUser.name,
      googleId: googleUser.id,
      created_at: now, // Thời gian hiện tại
      updated_at: now, // Thời gian hiện tại
    }

    await prisma.$transaction(async (tx) => {
      await tx.user.create({
        data: transformedUser,
        // data: {
        //   id: userId,
        //   username,
        //   displayName: googleUser.name,
        //   googleId: googleUser.id,
        // },
      });
      // stream upsertUser not working for free account https://getstream.io/
      // await streamServerClient.upsertUser({
      //   id: userId,
      //   username,
      //   name: username,
      // });
    });

    const session = await lucia.createSession(userId, {});
    const sessionCookie = lucia.createSessionCookie(session.id);
    cookies().set(
      sessionCookie.name,
      sessionCookie.value,
      sessionCookie.attributes,
    );

    return new Response(null, {
      status: 302,
      headers: {
        Location: "/",
      },
    });
  } catch (error) {
    console.error(error);
    if (error instanceof OAuth2RequestError) {
      return new Response(null, {
        status: 400,
      });
    }
    return new Response(null, {
      status: 500,
    });
  }
}
