import React, { useState } from 'react'
import { IconKeyframes,IconBookmarks, IconUsers, IconApps } from '@tabler/icons-react'
import contentUrl from '../../images/content-link-bg.jpg'
import listUrl from '../../images/list-link-bg.jpg'
import usersUrl from '../../images/users-link-bg.jpg'
import requestUrl from '../../images/request-link-bg.jpg'
import LinkCard from './LinkCard'

const Main = () => {
  const test = 'a'
  return (
    <div>
      <div className="mt-8 flex flex-col gap-4 justify-center items-center">
        <h2 className="text-2xl">Main links</h2>
        <div className="flex gap-8 flex-wrap justify-center p-4">
          <LinkCard
            imgUrl={contentUrl}
            title="Content"
            description="Films, manga, books..."
            icon={<IconKeyframes width="32" height="32" />}
            buttonText="Browse all"
            linkTo="/content"
          />
          <LinkCard
            imgUrl={listUrl}
            title="Tracking list"
            description="Your current progress"
            icon={<IconBookmarks width="32" height="32" />}
            buttonText="Check it"
            linkTo="/my-list"
          />
          <LinkCard
            imgUrl={usersUrl}
            title="Search others"
            description="Find something new"
            icon={<IconUsers width="32" height="32" />}
            buttonText="Look for"
            linkTo="/users"
          />
          <LinkCard
            imgUrl={requestUrl}
            title="Add content item"
            description="Make a request"
            icon={<IconApps width="32" height="32" />}
            buttonText="Write us"
            linkTo="/request-content"
          />
        </div>
      </div>
    </div>
  )
}

export default Main
