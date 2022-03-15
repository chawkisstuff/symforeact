import axios from 'axios';
import { getToken } from '../utils/isAuth.util';

const LOGIN_BASE_URL = "http://127.0.0.1:8000/login";

function loginService(data) {
    return axios.post(LOGIN_BASE_URL, { 
      headers: {
        "Authorization": getToken()
      }, 
      data
    });
  }

export default loginService