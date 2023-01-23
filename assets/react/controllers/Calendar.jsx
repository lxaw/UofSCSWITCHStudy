// assets/react/controllers/MyComponent.jsx
import React, { useState } from 'react';

import Calendar from 'react-calendar';
import './calendar.css'

import moment from 'moment/moment';

export default function () {
    const [date, setDate] = useState(new Date());

    const mark = [
        '01-01-2023'
    ]

  return (
    <div className='app'>
      <div className='calendar-container'>
        <Calendar 
            onChange={setDate} 
            value={date} 
            locale="en-EN"
        />
      </div>
      <p className='text-center'>
        <span className='bold'>Selected Date:</span>{' '}
        {date.toDateString()}
      </p>
    </div>
  );
}