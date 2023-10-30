import { Link } from 'react-router-dom'
import React, { useCallback } from 'react'

import ContentCard from '../../components/Cards/ContentCard/ContentCard'
import { useTypedDispatch, useTypedSelector } from '../../hooks/storeHooks'
import { selectContents } from '../../store/reducers/ContentsSlice/selectors'
import { getAllContents } from '../../store/reducers/ContentsSlice/asyncThunks'
import Button from '../../components/Buttons/Button'
import { useInfiniteList } from '../../hooks/useInfiniteList'

const ContentsPage = () => {
  const dispatch = useTypedDispatch()
  const contents = useTypedSelector(selectContents)
  const { data } = contents
  const fetchCb = useCallback(({ page, per_page }: { page: number; per_page: number }) => {
    dispatch(getAllContents({ page, per_page }))
  }, [])
  useInfiniteList(contents, fetchCb)
  return (
    <div>
      <Link to="/">
        <Button>GO HOME</Button>
      </Link>
      <div className="flex flex-row flex-wrap justify-center gap-6 pt-4">
        {data.map((content) => (
          <ContentCard key={content.id} content={content}/>
        ))}
      </div>
    </div>
  )
}

export default ContentsPage
