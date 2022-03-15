import axios from 'axios';
 
const CANDIDAT_API_BASE_URL = "http://127.0.0.1:8000/candidat";

class CandidatService{

    getCandidat(){
        return axios.get(CANDIDAT_API_BASE_URL+'/'+'get');
    }
    createCandidat(candidat){
        return axios.post(CANDIDAT_API_BASE_URL+"/new");
    }
    editCandidat(id){
        return axios.put(CANDIDAT_API_BASE_URL+'/'+id+'/'+"edit");
    }
    deleteCandidat(id){
        return axios.post(CANDIDAT_API_BASE_URL+ '/' + id);
    }
}

export default new CandidatService()