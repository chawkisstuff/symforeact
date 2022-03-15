import React from 'react'
import "./signUp.css";
import { Link } from "react-router-dom";

export default function signUp() {

  
  return (
      <div className='signup'>
        
        <div className='wrapper'>
        <center>
        <center>
        <div className='title'>
              <h1> REGISTER </h1>
        </div>
        </center>
        <div className="formCenter">
        <form className="formFields">
            <div>
            </div>
            <div>
              <input
                type="text"
                id="firstname"
                className="formFieldInput"
                placeholder="First Name"
                name="firstname"
              />
              
            </div>
            <div>
              <input
                type="text"
                id="lastname"
                className="formFieldInput"
                placeholder="First Name"
                name="lastname"
              />
              
            </div>
            <div>
              <input
                type="text"
                id="phonenumber"
                className="formFieldInput"
                placeholder="Phone number"
                name="phonenumber"
              />
              
            </div>
            <div>
              <input
                type="email"
                id="email"
                className="formFieldInput"
                placeholder="Email"
                name="email"
              />
              
            </div>
            <div className="formField">
            <input
              type="password"
              id="password"
              className="formFieldInput"
              placeholder="Enter your password"
              name="password"
            />
          </div>
          <div className="formField">
            <button className="formFieldButton">SUBMIT</button>
          </div>
          <Link to="/signup" className="formFieldLink">
              already have an account?
          </Link>

          </form>
        </div>
        </center>
      </div>
      </div>
  )
}
