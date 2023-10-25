import AuthService from "./AuthService";
import ContentsService from "./ContentsService";

export const Services = {
  AUTH: AuthService as typeof AuthService,
  CONTENTS: ContentsService as typeof ContentsService
} as const
