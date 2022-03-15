import React, { useState } from 'react'
import "./logIn.css";
import { Link, useHistory } from "react-router-dom";
import storage from '../../utils/storage.util';
import loginService from '../../services/LoginService';

export default function LogIn() {
  const [form, setForm] = useState({
    email: '',
    password: ''
  });

  const history = useHistory();

  const handleChange = (event) => setForm({
    ...form,
    [event.target.name]: event.target.value
  })
  
  // export default function loginBackend()

  const handleSubmit = async (event) => {
    event.preventDefault();
    console.log(form);
    // call to backend to request access by athenticate....
    // const response = await loginService(form) // from: { email: 'chaouki@chaouki.com', password: '123456789' }

    storage.write('_token', 'token');
    setTimeout(() => {
      history.push('/home');
    }, 2000)
  }

  return (
      <div className='login'>
        <div className='wrapper'>
        <center>
        <center>
          <div className='title'>
            <h1> LOG INTO YOUR ACCOUNT </h1>
          </div>
        </center>
        <div className="formCenter">
        <form className="formFields" onSubmit={handleSubmit}>
            <div>
            </div>
            <div>
              <input
                type="email"
                value={form.email}
                id="email"
                className="formFieldInput"
                placeholder="Enter your email"
                name="email"
                onChange={handleChange}
              />              
            </div>
            <div className="formField">
              <br></br>
              <br></br>
            <input
              type="password"
              id="password"
              value={form.password}
              className="formFieldInput"
              placeholder="Enter your password"
              name="password"
              onChange={handleChange}
            />
          </div>
          <div className="formField">
            <button className="formFieldButton">LOGIN</button>
          </div>
          <Link to="/signup" className="formFieldLink">
              Don't have an account?
          </Link>

          </form>
        </div>
        </center>
      </div>
      </div>
  )
}
