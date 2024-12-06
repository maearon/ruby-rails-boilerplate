"use server";

import { lucia } from "@/auth";
import prisma from "@/lib/prisma";
import { loginSchema, LoginValues } from "@/lib/validation";
import bcrypt from 'bcrypt';
import { isRedirectError } from "next/dist/client/components/redirect";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";

export async function login(
  credentials: LoginValues,
): Promise<{ error: string }> {
  try {
    const { username, password } = loginSchema.parse(credentials);

    const existingUser = await prisma.user.findFirst({
      where: {
        username: {
          equals: username,
          mode: "insensitive",
        },
      },
    });

    if (!existingUser || !existingUser.passwordHash) {
      return {
        error: "Incorrect username or password",
      };
    }

    // Use bcrypt to compare the entered password with the stored hash
    const validPassword = await bcrypt.compare(password, existingUser.passwordHash);

    if (!validPassword) {
      return {
        error: "Incorrect username or password",
      };
    }

    // Create a session for the user if authentication is successful
    const session = await lucia.createSession(existingUser.id, {});
    const sessionCookie = lucia.createSessionCookie(session.id);
    
    // Set the session cookie in the browser
    cookies().set(
      sessionCookie.name,
      sessionCookie.value,
      sessionCookie.attributes,
    );

    // Redirect to the home page after successful login
    return redirect("/");
  } catch (error) {
    // Check if the error is a redirect error and throw it
    if (isRedirectError(error)) throw error;

    // Log the error details to help diagnose the issue
    console.error("Login error:", error);

    // Return a generic error message to the user
    return {
      error: "Something went wrong. Please try again.",
    };
  }
}
