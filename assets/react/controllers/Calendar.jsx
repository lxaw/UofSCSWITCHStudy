// assets/react/controllers/MyComponent.jsx
import React, { useState } from 'react';

import Calendar from 'react-calendar';

export default function () {
    const [value,onChange] = useState(new Date());

    return (
        <div>
            <h1>Hellow</h1>
            <Calendar onChange={onChange} value={value}/>
        </div>
    )
}