// assets/react/controllers/MyComponent.jsx
import React, { useState } from 'react';

import Calendar from 'react-calendar';
import 'react-calendar/dist/Calendar.css'
import './calendar.css'

import moment from 'moment/moment';

export default function (props) {
  const [date, setDate] = useState(new Date());

  const clickDate = (dateObj) =>{
    const strFormattedDate = moment(dateObj).format('YYYY-MM-DD');
    // document.location.href = `/food/date/${strFormattedDate}/`
    if(props.marks.includes(strFormattedDate)){
      
    }else{
      console.log('there')
    }
    setDate(dateObj);
  }
  
  return (
    <div className='app justify-content-center'>
      <div className='calendar-container'>
        <Calendar 
            onChange={clickDate} 
            value={date} 
            locale="en-EN"
            tileContent = {
              ({activeStateDate, date, view}) => {
                return view === "month" && date.getDay() === 0 
                ? <span onClick={clickDate}></span> : null
              }
            }
            tileClassName={({ date, view }) => {
              if(props.marks.find(x=>x===moment(date).format("YYYY-MM-DD"))){
                return "highlight"
              }
            }}
        />
      </div>
      <p>
        <span className='bold'>Selected Date:</span>{' '}
        {date.toDateString()}
      </p>
    </div>
  );
}