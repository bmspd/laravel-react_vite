import React from 'react'
import { Link } from 'react-router-dom'
import moment from 'moment'
import { IContent } from '../../../interfaces/Content'
import notFound from '../../../images/not_found.jpg'
import ContentCardTooltip from "../../Tooltips/ContentCardTooltip/ContentCardTooltip";
import {ActionIcon, UserStatusIcon} from "./Icons";

type ContentCardProps = {
  content: IContent
}

const ContentCard: React.FC<ContentCardProps> = ({ content }) => {
  const { poster } = content
  const posterUrl = poster?.path ?? notFound
  const releaseYear = content.release_date ? moment(content.release_date).year() : null
  const cardId = `${content.id}`
  return (
    <>
      <Link to={`${content.id}`} data-tooltip-id={cardId}>
        <div
          className="w-72 h-96 border rounded-lg bg-cover bg-center flex flex-col justify-between cursor-pointer"
          style={{ backgroundImage: `url(${posterUrl})` }}
        >
          <div className="rounded-t-lg w-full h-12 backdrop-blur-md bg-black/50 p-1 flex flex-row gap-2 items-center justify-end">
            <ActionIcon action={content.type?.action} />
            {!!content.info?.status && <UserStatusIcon status={content.info?.status} />}
          </div>
          <div className="flex flex-col justify-between rounded-b-lg w-full h-16 backdrop-blur-md bg-black/50 p-1">
            <h2 className="text-lg text-ellipsis overflow-hidden whitespace-nowrap">
              {content.name}
            </h2>
            <div className="flex flex-row justify-between text-base">
              <h3>{content.type?.name}</h3>
              <h3>{releaseYear}</h3>
            </div>
          </div>
        </div>
      </Link>
      <ContentCardTooltip cardId={cardId} content={content}/>
    </>
  )
}

export default ContentCard
