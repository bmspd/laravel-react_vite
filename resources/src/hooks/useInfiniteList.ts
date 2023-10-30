import { useEffect, useMemo } from 'react'

import { useDidMount } from './useDidMount'
import { DataWithMeta } from '../interfaces/Data'

type TFetchCb = ({ page, per_page }: { page: number; per_page: number }) => void
export const useInfiniteList = <Data extends DataWithMeta<unknown, 'pagination'>>(
  data: Data,
  fetchCb: TFetchCb
) => {
  const didMount = useDidMount()
  const html = useMemo(() => document.querySelector('html'), [])
  const onScroll = () => {
    if (!html) return
    if (html.scrollTop + html.clientHeight >= html.scrollHeight) {
      console.log('i am here')
      const { pagination } = data.meta
      if (pagination && pagination.current_page < pagination.total_pages) {
        fetchCb({ page: pagination.current_page + 1, per_page: 2 })
      }
    }
  }
  useEffect(() => {
    fetchCb({ page: 1, per_page: 2 })
  }, [])
  useEffect(() => {
    if (didMount) return () => null
    onScroll()
    document.addEventListener('scroll', onScroll)
    return () => {
      document.removeEventListener('scroll', onScroll)
    }
  }, [data])
}
