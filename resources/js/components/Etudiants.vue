<template>
    <div>
        <div class="card card-flush border-0">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <!--begin::Add product-->
                    <button @click="showCreateEtudiantModel" class="btn btn-primary">Ajouter Etudiant</button>
                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table  table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">cne</th>
                        <th class="min-w-70px">prenom</th>
                        <th class="min-w-70px">Nom</th>
                        <th class="min-w-100px">date de naissance</th>
                        <th class="min-w-100px">Type de bac</th>
                        <th class="min-w-100px">Formation</th>
                        <th class="min-w-70px">Opérations</th>
                    </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600 border-top-0">
                    <tr v-for="etudiant in etudiants" :key="etudiant.id">

                        <td class="pe-0">
                            <span class="fw-bolder">{{etudiant.cne}}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.prenom }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.nom }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.date_naissance }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.bac_type }}</span>
                        </td>
                        <td class="pe-0">
                            <span class="fw-bolder">{{ etudiant.formation.titre }}</span>
                        </td>
                        <td>
                            <button @click="showUpdateEtudiantModel(etudiant.id)" class="btn btn-primary">Editer</button>
                            <button @click="deleteEtudiant(etudiant.id)" class="btn btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_create_etudiant" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mw-700px">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                        <div class="text-center mb-13">
                            <h1 class="d-flex justify-content-center align-items-center mb-3">Create Etudiant</h1>
                        </div>
                        <div v-if="errors.length>0" class="alert alert-danger" role="alert">
                            <ul>
                                <li v-for="(error,index) in errors" :key="index">{{error}}</li>
                            </ul>
                        </div>
                        <div class="mh-475px scroll-y me-n7 pe-7">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="required">CNE</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's email." aria-label="Enter the contact's email."></i>
                                            </label>
                                            <input   v-model="etudiant.cne" type="text"  class="form-control form-control-solid">
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="discount-label required">Type de Bac</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                            </label>
                                            <input v-model="etudiant.bacType"  type="text" min="0" class="form-control form-control-solid">
                                        </div>
                                    </div>

                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="required">Prenom</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's email." aria-label="Enter the contact's email."></i>
                                            </label>
                                            <input   v-model="etudiant.prenom" type="text" min="0" class="form-control form-control-solid">
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="discount-label required">Nom</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                            </label>
                                            <input  v-model="etudiant.nom" type="text" min="0" class="form-control form-control-solid">
                                        </div>
                                    </div>

                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Date de naissance</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's name." aria-label="Enter the contact's name."></i>
                                    </label>
                                    <input v-model="etudiant.dateNaissance"  type="date" class="form-control form-control-solid" name="name">
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>

                                <div v-if="formations.length>0" class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <label class="required form-label">Formation</label>
                                    <select v-model="etudiant.formation" class="form-select form-control" aria-label="Default select example">
                                        <option v-for="formation in formations" :key="formation.id" :value="formation.id">{{formation.titre}}</option>
                                    </select>
                                </div>
                                <div v-else class="alert alert-warning">
                                    Pour le moment, vous n'avez pas de formation, vous devez d'abord en créer une pour pouvoir créer des étudiants
                                   <a href="/" class="btn btn-primary" >Créer une formation</a>
                                </div>
                                <div  class="fv-row my-5 fv-plugins-icon-container">
                                    <button @click="createEtudiant" class="btn btn-success float-end"> Créer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_update_etudiant" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog mw-700px">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                        <div class="text-center mb-13">
                            <h1 class="d-flex justify-content-center align-items-center mb-3">Mettre à jour Etudiant</h1>
                        </div>
                        <div v-if="errors.length>0" class="alert alert-danger" role="alert">
                            <ul>
                                <li v-for="(error,index) in errors" :key="index">{{error}}</li>
                            </ul>
                        </div>
                        <div class="mh-475px scroll-y me-n7 pe-7">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="required">CNE</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's email." aria-label="Enter the contact's email."></i>
                                            </label>
                                            <input disabled  :value="etudiant.cne" type="text"  class="form-control form-control-solid">
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="discount-label required">Type de Bac</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                            </label>
                                            <input v-model="etudiant.bacType"  type="text" min="0" class="form-control form-control-solid">
                                        </div>
                                    </div>

                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="required">Prenom</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's email." aria-label="Enter the contact's email."></i>
                                            </label>
                                            <input   v-model="etudiant.prenom" type="text" min="0" class="form-control form-control-solid">
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <span class="discount-label required">Nom</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's phone number (optional)." aria-label="Enter the contact's phone number (optional)."></i>
                                            </label>
                                            <input  v-model="etudiant.nom" type="text" min="0" class="form-control form-control-solid">
                                        </div>
                                    </div>

                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Date de naissance</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter the contact's name." aria-label="Enter the contact's name."></i>
                                    </label>
                                    <input type="date" v-model="etudiant.dateNaissance" class="form-control form-control-solid">
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <label class="required form-label">Formation</label>
                                    <select v-model="etudiant.formation" class="form-select form-control" aria-label="Default select example">
                                        <option v-for="formation in formations" :key="formation.id" :value="formation.id">{{formation.titre}}</option>
                                    </select>
                                </div>
                                <div class="fv-row my-5 fv-plugins-icon-container">
                                    <button @click="updateEtudiant" class="btn btn-success float-end">Mettre à jour </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Etudiants",
    data(){
        return{
            etudiants:{},
            formations:{},
            etudiant:{
                id:'',
                cne:'',
                nom:'',
                prenom:'',
                bacType:'',
                dateNaissance:'',
                formation:null
            },
            errors:[]
        }
    },
    created() {
        axios.get('etudiants')
            .then(response=>this.etudiants=response.data.data)
            .catch(({response})=>{
                this.errors= Object.values(response.data.errors).map(error=>error[0]);
            });
          axios.get('formations')
            .then(response=>this.formations=response.data.data)
              .catch(({response})=>{
                  this.errors= Object.values(response.data.errors).map(error=>error[0]);
              });
    },
    methods:{
        showCreateEtudiantModel(){
            let EtudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_create_etudiant'));
            EtudiantModal.show();
            this.errors=[]
        },
        showUpdateEtudiantModel(id){
            let etudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_update_etudiant'));
            let currentEtudiant=this.etudiants.find(etudiant=>etudiant.id==id)
            this.etudiant={
                id:currentEtudiant.id,
                cne:currentEtudiant.cne,
                nom:currentEtudiant.nom,
                prenom:currentEtudiant.prenom,
                bacType:currentEtudiant.bac_type,
                dateNaissance:currentEtudiant.date_naissance,
                formation:currentEtudiant.formation_id
            };
            this.errors=[]
            etudiantModal.show()
        },
         createEtudiant(){
             axios.post('etudiants',
                {
                    cne:this.etudiant.cne,
                    nom:this.etudiant.nom,
                    prenom:this.etudiant.prenom,
                    bacType:this.etudiant.bacType,
                    dateNaissance:this.etudiant.dateNaissance,
                    formationId:this.etudiant.formation
                }
            )
                .then(()=>{

                    let etudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_create_etudiant'));
                    etudiantModal.hide();
                    this.etudiant={
                        id:null,
                            cne:'',
                            nom:'',
                            prenom:'',
                            bacType:'',
                            dateNaissance:'',
                            formation:null
                    }
                    this.errors=[]
                    this.getAllEtudiants();
                })
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        },
        updateEtudiant(){
            axios.put(`etudiants/${this.etudiant.id}`,
                {
                    nom:this.etudiant.nom,
                    prenom:this.etudiant.prenom,
                    bacType:this.etudiant.bacType,
                    dateNaissance:this.etudiant.dateNaissance,
                    formationId:this.etudiant.formation
                }
                )
                .then(()=>{
                    this.etudiant={
                        id:null,
                        cne:'',
                        nom:'',
                        prenom:'',
                        bacType:'',
                        dateNaissance:'',
                        formation:null
                    }
                    this.getAllEtudiants();
                    let etudiantModal = new bootstrap.Modal(document.getElementById('kt_modal_update_formation'));
                    etudiantModal.hide();
                })
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        },
        deleteEtudiant(id){
            axios.delete(`etudiants/${id}`,)
                .then(()=>{
                    this.etudiants=this.etudiants.filter(etudiant=>etudiant.id!=id)
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getAllEtudiants(){
            axios.get('etudiants')
                .then(response=>this.etudiants=response.data.data)
                .catch(({response})=>{
                    this.errors= Object.values(response.data.errors).map(error=>error[0]);
                });
        }


    }
}
</script>

<style scoped>
.form-control{
    background-color: #bdeef987;
    padding: 10px;
}
</style>
