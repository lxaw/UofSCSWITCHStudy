// assets/react/controllers/MyComponent.jsx
import React, { useState } from 'react';

import Calendar from 'react-calendar';
import './calendar.css'

import moment from 'moment/moment';

export default function (props) {
  const [date, setDate] = useState(new Date());
  
  const style = {color:'red'}

  return (
    <div className='app'>
      <div className='calendar-container'>
        <Calendar 
            onChange={setDate} 
            value={date} 
            locale="en-EN"
            tileClassName={({ date, view }) => {
              if(props.marks.find(x=>x===moment(date).format("YYYY-MM-DD"))){
                console.log(date)
                return style
              }
            }}
        />
      </div>
      <p className='text-center'>
        <span className='bold'>Selected Date:</span>{' '}
        {date.toDateString()}
      </p>
    </div>
  );
}