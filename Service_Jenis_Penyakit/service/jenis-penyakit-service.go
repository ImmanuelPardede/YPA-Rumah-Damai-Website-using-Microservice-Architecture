package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/model"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/repository"
	"github.com/mashingan/smapping"
)

// JenisPenyakitService is a contract about something that this service can do
type JenisPenyakitService interface {
	Insert(d dto.JenisPenyakitCreateDTO) model.JenisPenyakit
	Update(d dto.JenisPenyakitUpdateDTO) model.JenisPenyakit
	Delete(d model.JenisPenyakit)
	All() []model.JenisPenyakit
	FindByID(jenisPenyakitID uint64) model.JenisPenyakit
}

type jenisPenyakitService struct {
	jenisPenyakitRepository repository.JenisPenyakitRepository
}

// NewJenisPenyakitService creates a new instance of JenisPenyakitService
func NewJenisPenyakitService(jenisPenyakitRepository repository.JenisPenyakitRepository) JenisPenyakitService {
	return &jenisPenyakitService{
		jenisPenyakitRepository: jenisPenyakitRepository,
	}
}

func (service *jenisPenyakitService) All() []model.JenisPenyakit {
	return service.jenisPenyakitRepository.All()
}

func (service *jenisPenyakitService) FindByID(jenisPenyakitID uint64) model.JenisPenyakit {
	id := uint(jenisPenyakitID)
	return service.jenisPenyakitRepository.FindByID(id)
}

func (service *jenisPenyakitService) Insert(d dto.JenisPenyakitCreateDTO) model.JenisPenyakit {
	jenisPenyakit := model.JenisPenyakit{}
	err := smapping.FillStruct(&jenisPenyakit, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisPenyakitRepository.InsertJenisPenyakit(jenisPenyakit)
	return res
}

func (service *jenisPenyakitService) Update(d dto.JenisPenyakitUpdateDTO) model.JenisPenyakit {
	jenisPenyakit := model.JenisPenyakit{}
	err := smapping.FillStruct(&jenisPenyakit, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisPenyakitRepository.UpdateJenisPenyakit(jenisPenyakit)
	return res
}

func (service *jenisPenyakitService) Delete(d model.JenisPenyakit) {
	service.jenisPenyakitRepository.DeleteJenisPenyakit(d)
}
