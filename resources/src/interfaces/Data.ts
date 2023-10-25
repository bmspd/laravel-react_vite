export interface Pagination {
  current_page: number
  per_page: number
  total: number
  total_pages: number
}
export interface OtherMeta {
  test: string
}
export type AllMetaTypes = {
  pagination: Pagination
  other_meta: OtherMeta
}
export interface DataWithMeta<T, MetaTypes extends 'pagination' | 'other_meta'> {
  data: T[]
  meta: { [Literal in MetaTypes]?: AllMetaTypes[Literal] }
}
