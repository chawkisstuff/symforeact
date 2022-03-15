import storage from './storage.util'

export function getToken() {
  return storage.read('_token');
}
export function isAuth() {
  const token = getToken();
  console.log('------------- auth')
  return token ? true : false;
}
