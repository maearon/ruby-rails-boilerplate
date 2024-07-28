"use server";

import { lucia } from "@/auth";
import prisma from "@/lib/prisma";
// import streamServerClient from "@/lib/stream";
import { signUpSchema, SignUpValues } from "@/lib/validation";
// import { hash } from "@node-rs/argon2";
import bcrypt from 'bcrypt';
// import { scrypt, randomBytes } from 'crypto';
// import { promisify } from 'util';
import { Prisma } from "@prisma/client";
import { generateIdFromEntropySize } from "lucia";
import { isRedirectError } from "next/dist/client/components/redirect";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";

type UserCreateInput = Prisma.UserCreateInput;

export async function signUp(
  credentials: SignUpValues,
): Promise<{ error: string }> {
  try {
    const { username, email, password } = signUpSchema.parse(credentials);

    // const passwordHash = await hash(password, {
    //   memoryCost: 19456,
    //   timeCost: 2,
    //   outputLen: 32,
    //   parallelism: 1,
    // });

    const passwordHash = await bcrypt.hash(password, 12);

    const userId = generateIdFromEntropySize(10);

    const existingUsername = await prisma.user.findFirst({
      where: {
        username: {
          equals: username,
          mode: "insensitive",
        },
      },
    });

    if (existingUsername) {
      return {
        error: "Username already taken",
      };
    }

    const existingEmail = await prisma.user.findFirst({
      where: {
        email: {
          equals: email,
          mode: "insensitive",
        },
      },
    });

    if (existingEmail) {
      return {
        error: "Email already taken",
      };
    }

    const now = new Date().toISOString(); // Thời gian hiện tại dưới định dạng ISO 8601

    const transformedUser: UserCreateInput = {
      id: userId,
      username,
      displayName: username,
      email,
      passwordHash, // Đây là nơi bạn gán giá trị đã hash cho passwordHash
      created_at: now, // Thời gian hiện tại
      updated_at: now, // Thời gian hiện tại
    }

    await prisma.$transaction(async (tx) => {
      await tx.user.create({
        // data: {
        //   id: userId,
        //   username,
        //   displayName: username,
        //   email,
        //   passwordHash,
        // },
        data: transformedUser,
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

    return redirect("/");
  } catch (error) {
    if (isRedirectError(error)) throw error;
    console.error(error);
    return {
      error: "Something went wrong. Please try again.",
    };
  }
}
