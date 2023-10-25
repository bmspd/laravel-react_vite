import React, {useEffect} from 'react';
import ContentCard from "../../components/Cards/ContentCard";
import {useTypedDispatch, useTypedSelector} from "../../hooks/storeHooks";
import {selectContents} from "../../store/reducers/ContentsSlice/selectors";
import {getAllContents} from "../../store/reducers/ContentsSlice/asyncThunks";

const ContentsPage = () => {
  const dispatch = useTypedDispatch()
  const contents = useTypedSelector(selectContents)
  useEffect(() => {
    dispatch(getAllContents())
  }, [])
  return (
    <div>
      <ContentCard />
      <pre>{JSON.stringify(contents, undefined, 4)}</pre>
    </div>
  );
};

export default ContentsPage;
