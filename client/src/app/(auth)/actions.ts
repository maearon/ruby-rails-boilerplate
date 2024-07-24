"use server";

import { lucia, validateRequest } from "@/auth";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";

export async function logout() {
  const { session } = await validateRequest();

  if (!session) {
    throw new Error("Unauthorized");
  }

  await lucia.invalidateSession(session.id);

  const sessionCookie = lucia.createBlankSessionCookie();

  cookies().set(
    sessionCookie.name,
    sessionCookie.value,
    sessionCookie.attributes,
  );

  // const rememberMe = "1";

  // if (rememberMe) {
  //   localStorage.removeItem("token")
  //   localStorage.removeItem("remember_token")
  // } else {
  //   sessionStorage.removeItem("token")
  //   sessionStorage.removeItem("remember_token")
  // }

  return redirect("/login");
}
