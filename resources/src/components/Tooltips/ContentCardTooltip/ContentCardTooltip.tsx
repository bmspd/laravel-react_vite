import React from 'react';
import {Link} from "react-router-dom";
import {IconUser, IconUsers} from "@tabler/icons-react";
import {Tooltip} from "react-tooltip";
import Tag from "../../Tags/Tag";
import {COLORS_VARIANTS} from "../../../constants/colors";
import {IContent} from "../../../interfaces/Content";
import RatingIcon from "./RatingIcon";

type ContentCardTooltipProps = {
  cardId: string
  content: IContent
}

const ContentCardTooltip:React.FC<ContentCardTooltipProps> = ({cardId, content}) => {
  return <Tooltip
    className="z-10 backdrop-blur-sm !bg-white/80 !w-72 drop-shadow-2xl"
    id={cardId}
    opacity={1}
    clickable
    place="right"
    delayShow={400}
    arrowColor="white"
  >
    <div className="h-full w-full flex flex-col g-2 text-black">
      <Link to={`${content.id}`}>
        <h2 className="text-base line-clamp-2 text-blue-700">{content.name}</h2>
      </Link>
      <p className="text-xs line-clamp-5">{content.description}</p>
      <div className="my-1 flex gap-1">
        <Tag name={content.type?.name} />
        <Tag name={content.current_status} />
      </div>
      <div className="py-1 border-t border-t-black flex flex-col gap-1">
        {content.info && (
          <div className="flex gap-2 items-center">
            <IconUser width={16} height={16} />
            <Tag name={content.info.status?.name} variant={COLORS_VARIANTS.SUCCESS} />
            <RatingIcon rating={content.info.rating} />
          </div>
        )}
        <div className="flex gap-2 items-center">
          <IconUsers width={16} height={16} />
          <span>...</span>
        </div>
      </div>
    </div>
  </Tooltip>
};

export default ContentCardTooltip;
