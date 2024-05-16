package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Visitor_Carousel/dto"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/model"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/repository"
	"github.com/mashingan/smapping"
)

// PromotedService is a contract about something that this service can do
type CarouselService interface {
	Insert(b dto.CarouselCreateDTO) model.Carousel
	Update(b dto.CarouselUpdateDTO) model.Carousel
	Delete(b model.Carousel)
	All() []model.Carousel
	FindByID(carouselID uint64) model.Carousel
}

type carouselService struct {
	carouselRepository repository.CarouselRepository
}

// NewcarouselService creates a new instance of carouselService
func NewCarouselService(carouselRepository repository.CarouselRepository) CarouselService {
	return &carouselService{
		carouselRepository: carouselRepository,
	}
}

func (service *carouselService) All() []model.Carousel {
	return service.carouselRepository.All()
}

func (service *carouselService) FindByID(carouselID uint64) model.Carousel {

	id := uint(carouselID)
	return service.carouselRepository.FindByID(id)
}

func (service *carouselService) Insert(b dto.CarouselCreateDTO) model.Carousel {
	carousel := model.Carousel{}
	err := smapping.FillStruct(&carousel, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.carouselRepository.InsertCarousel(carousel)
	return res
}

func (service *carouselService) Update(b dto.CarouselUpdateDTO) model.Carousel {
	carousel := model.Carousel{}
	err := smapping.FillStruct(&carousel, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.carouselRepository.UpdateCarousel(carousel)
	return res
}

func (service *carouselService) Delete(b model.Carousel) {
	service.carouselRepository.DeleteCarousel(b)
}
