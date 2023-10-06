import AuthService from "./AuthService";

export const Services = {
  AUTH: AuthService as typeof AuthService
} as const
