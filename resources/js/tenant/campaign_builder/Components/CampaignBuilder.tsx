import {useState} from 'react';

export default () => {
    const [counter, setCounter] = useState(0);

    const add = () => {
        setCounter(counter + 1);
    }

    return (
        <>
            <div>Hello {counter}</div>
            <button className="btn btn-primary" style={{color: "red"}} onClick={add}>Add</button>
        </>
    )
}
