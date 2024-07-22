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

    if (!response.user || !response.user.passwordHash) {
      return {
        error: "Incorrect username or password",
      };
    }

    const existingUser = response.user;

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
