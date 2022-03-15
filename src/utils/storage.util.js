function read (key) {
  return localStorage.getItem(key);
}

function write(key, value) {
  localStorage.setItem(key, value);
}

function reInit() {
  localStorage.clear();
}

export default { read, write, reInit }
