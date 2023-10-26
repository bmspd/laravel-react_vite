import $http from "../index";
import {IContent} from "../../interfaces/Content";
import {DataWithMeta} from "../../interfaces/Data";

export type ContentsRequestParams = {
  page?: number,
  per_page?: number
  include?: string[]
}

export default class ContentsService {
  static async getContents(params: ContentsRequestParams) {
    return $http.get<DataWithMeta<IContent, 'pagination' | 'timestamps'>>('contents', {params})
  }
}
