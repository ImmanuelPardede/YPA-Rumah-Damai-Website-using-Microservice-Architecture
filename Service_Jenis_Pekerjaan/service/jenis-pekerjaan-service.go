package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/model"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/repository"
	"github.com/mashingan/smapping"
)

// JenisPekerjaanService is a contract about something that this service can do
type JenisPekerjaanService interface {
	Insert(a dto.JenisPekerjaanCreateDTO) model.JenisPekerjaan
	Update(a dto.JenisPekerjaanUpdateDTO) model.JenisPekerjaan
	Delete(a model.JenisPekerjaan)
	All() []model.JenisPekerjaan
	FindByID(jenisPekerjaanID uint64) model.JenisPekerjaan
}

type jenisPekerjaanService struct {
	jenisPekerjaanRepository repository.JenisPekerjaanRepository
}

// NewJenisPekerjaanService creates a new instance of JenisPekerjaanService
func NewJenisPekerjaanService(jenisPekerjaanRepository repository.JenisPekerjaanRepository) JenisPekerjaanService {
	return &jenisPekerjaanService{
		jenisPekerjaanRepository: jenisPekerjaanRepository,
	}
}

func (service *jenisPekerjaanService) All() []model.JenisPekerjaan {
	return service.jenisPekerjaanRepository.All()
}

func (service *jenisPekerjaanService) FindByID(jenisPekerjaanID uint64) model.JenisPekerjaan {
	id := uint(jenisPekerjaanID)
	return service.jenisPekerjaanRepository.FindByID(id)
}

func (service *jenisPekerjaanService) Insert(a dto.JenisPekerjaanCreateDTO) model.JenisPekerjaan {
	jenisPekerjaan := model.JenisPekerjaan{}
	err := smapping.FillStruct(&jenisPekerjaan, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisPekerjaanRepository.InsertJenisPekerjaan(jenisPekerjaan)
	return res
}

func (service *jenisPekerjaanService) Update(a dto.JenisPekerjaanUpdateDTO) model.JenisPekerjaan {
	jenisPekerjaan := model.JenisPekerjaan{}
	err := smapping.FillStruct(&jenisPekerjaan, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisPekerjaanRepository.UpdateJenisPekerjaan(jenisPekerjaan)
	return res
}

func (service *jenisPekerjaanService) Delete(a model.JenisPekerjaan) {
	service.jenisPekerjaanRepository.DeleteJenisPekerjaan(a)
}
