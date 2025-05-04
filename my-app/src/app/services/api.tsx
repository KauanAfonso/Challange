
import axios from 'axios';

//criando uma base para api
const api = axios.create({
  baseURL: 'http://192.168.56.1:8000/api', // Altere para seu IP local
});

export default api;
