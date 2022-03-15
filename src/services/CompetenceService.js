import axios from 'axios';

const COMPETENCE_API_BASE_URL = "http://127.0.0.1:8000/competence/list";

class CompetenceService{

    getCompetence(){
        return axios.get(COMPETENCE_API_BASE_URL+"/get");
    }
    createCompetence(competence){
        return axios.post(COMPETENCE_API_BASE_URL+"/new");
    }
    editCompetence(id){
        return axios.put(COMPETENCE_API_BASE_URL+'/'+id+'/'+"edit");
    }
    deleteCompetence(id){
        return axios.delete(COMPETENCE_API_BASE_URL+ '/' + id);
    }
}

export default new CompetenceService()