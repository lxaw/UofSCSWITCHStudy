// assets/react/controllers/MyComponent.jsx
import React, { useState } from 'react';

import Calendar from 'react-calendar';
import 'react-calendar/dist/Calendar.css'
import './calendar.css'

import moment from 'moment/moment';

export default function (props) {
  const [date, setDate] = useState(new Date());

  const [modalIsOpen,setIsOpen] = React.useState(false);


  const clickDate = (dateObj) =>{
    const strFormattedDate = moment(dateObj).format('YYYY-MM-DD');
    if(props.marks.includes(strFormattedDate)){
      var changePage = confirm("Would you like to see this date's entries?");
      if(changePage){
        document.location.href = `/food/date/${strFormattedDate}/`
      }
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