export interface Pagination {
  current_page: number
  per_page: number
  total: number
  total_pages: number
}
export interface Timestamps {
  request_time: string
}
export type AllMetaTypes = {
  pagination: Pagination
  timestamps: Timestamps
}
export interface DataWithMeta<T, MetaTypes extends 'pagination' | 'timestamps'> {
  data: T[]
  meta: { [Literal in MetaTypes]?: AllMetaTypes[Literal] }
}
