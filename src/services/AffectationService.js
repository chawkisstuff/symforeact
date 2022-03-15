import axios from 'axios';

const AFFECTATION_API_BASE_URL = "http://127.0.0.1:8000/SkillCand/";

class AffectationService{

    getAffectation(){
        return axios.get(AFFECTATION_API_BASE_URL+"/get");
    }
    createAffectation(SkillCand){
        return axios.post(AFFECTATION_API_BASE_URL+"/new");
    }
    editAffectation(id){
        return axios.put(AFFECTATION_API_BASE_URL+'/'+id+'/'+"edit");
    }
    deleteAffectation(id){
        return axios.delete(AFFECTATION_API_BASE_URL+ '/' + id);
    }
}

export default new AffectationService()