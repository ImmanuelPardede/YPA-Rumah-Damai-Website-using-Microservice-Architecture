package repository

import (
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/model"
	"gorm.io/gorm"
)

type CarouselRepository interface {
	InsertCarousel(carousel model.Carousel) model.Carousel
	UpdateCarousel(carousel model.Carousel) model.Carousel
	All() []model.Carousel
	FindByID(carouselID uint) model.Carousel
	DeleteCarousel(carousel model.Carousel)
}

type carouselConnection struct {
	connection *gorm.DB
}

func NewCarouselRepository(db *gorm.DB) CarouselRepository {
	return &carouselConnection{
		connection: db,
	}
}

func (db *carouselConnection) InsertCarousel(carousel model.Carousel) model.Carousel {
	db.connection.Save(&carousel)
	return carousel
}

func (db *carouselConnection) UpdateCarousel(carousel model.Carousel) model.Carousel {
	db.connection.Save(&carousel)
	return carousel
}

func (db *carouselConnection) All() []model.Carousel {
	var carousels []model.Carousel
	db.connection.Find(&carousels)
	return carousels
}

func (db *carouselConnection) FindByID(carouselID uint) model.Carousel {
	var carousel model.Carousel
	db.connection.Find(&carousel, carouselID)
	return carousel
}

func (db *carouselConnection) DeleteCarousel(carousel model.Carousel) {
	db.connection.Delete(&carousel)
}
