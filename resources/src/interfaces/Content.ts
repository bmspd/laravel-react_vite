import {IImage} from "./Image";

export interface IContent {
  id: number
  name: string
  description: string | null
  release_date: string | null
  end_date: string | null
  currentStatus: ContentCurrentStatus | null
  type_id: number
  type?: ContentType
  poster_id: number | null
  poster?: IImage
  info?: ContentInfo
}
export type ContentInfo = {
  rating: number | null
  status_id: number | null
  status?: ContentStatus
}
export type ContentStatus = {
  id: number
  name: string
}
export type ContentCurrentStatus = 'released' | 'stopped' | 'ongoing' | 'announced'
export type ContentTypeAction = 'read' | 'watch'

export interface ContentType {
  id: number
  name: string
  action: ContentTypeAction
}
