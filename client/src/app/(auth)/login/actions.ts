"use server";

import { lucia } from "@/auth";
import { create } from "@/components/shared/api/sessionApi";
// import prisma from "@/lib/prisma";
import { loginSchema, LoginValues } from "@/lib/validation";
// import { verify } from "@node-rs/argon2";
import { isRedirectError } from "next/dist/client/components/redirect";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";

export async function login(
  credentials: LoginValues,
): Promise<{ error: string }> {
  try {
    const { username, password } = loginSchema.parse(credentials);

    // const existingUser = await prisma.user.findFirst({
    //   where: {
    //     username: {
    //       equals: username,
    //       mode: "insensitive",
    //     },
    //   },
    // });

    const response = await create({ session: {username, password} });

    if (!response.user || !response.user.passwordHash || !response.tokens || !response.tokens.access) {
      return {
        error: "Incorrect username or password",
      };
    }

    // const existingUser = response.user;
    // const rememberMe = "1";

    // const validPassword = await verify(existingUser.passwordHash, password, {
    //   memoryCost: 19456,
    //   timeCost: 2,
    //   outputLen: 32,
    //   parallelism: 1,
    // });

    // if (!validPassword) {
    //   return {
    //     error: "Incorrect username or password",
    //   };
    // }

    const userId = response.user.id.toString();
    const session = await lucia.createSession(userId, {});
    const sessionCookie = lucia.createSessionCookie(session.id);
    cookies().set(
      sessionCookie.name,
      sessionCookie.value,
      sessionCookie.attributes,
    );

    // Calculate expiration date (30 days from now)
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 30);

    const accessToken = response.tokens.access.token;

    const jwt = {
      name: 'jwt',
      value: accessToken,
      attributes: {
        path: '/',
        httpOnly: true,
        secure: process.env.NODE_ENV === 'production',
        sameSite: 'lax' as 'lax' | 'strict' | 'none',
        expires: expirationDate // Pass Date object
      }
    };

    // Use cookies().set with correct typing
    cookies().set(
      jwt.name,
      jwt.value,
      {
        path: jwt.attributes.path,
        httpOnly: jwt.attributes.httpOnly,
        secure: jwt.attributes.secure,
        sameSite: jwt.attributes.sameSite,
        expires: jwt.attributes.expires // Pass Date object
      }
    );

    // if (rememberMe) {
    //   localStorage.setItem("token", response.tokens.access.token)
    //   localStorage.setItem("remember_token", response.tokens.access.token)
    // } else {
    //   sessionStorage.setItem("token", response.tokens.access.token)
    //   sessionStorage.setItem("remember_token", response.tokens.access.token)
    // }

    return redirect("/");
  } catch (error) {
    if (isRedirectError(error)) throw error;
    let errorMessage = "Something went wrong. Please try again.";
    if (error && typeof error === 'object' && 'message' in error) {
      errorMessage = (error as { message?: string }).message || errorMessage;
    } else if (typeof error === 'string') {
      errorMessage = error;
    }
    console.error(error);
    return {
      error: errorMessage,
    };
  }
}
