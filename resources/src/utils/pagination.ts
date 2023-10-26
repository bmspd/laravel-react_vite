import {Pagination} from "../interfaces/Data";

type TValidatePagination = (arg: {page?: number},pagination:  Pagination | undefined) => boolean
export const validatePagination: TValidatePagination = (arg,pagination) => {
  if (!pagination) {
    return true
  }
  return pagination && pagination.current_page + 1 === (arg.page ?? 1);

}
