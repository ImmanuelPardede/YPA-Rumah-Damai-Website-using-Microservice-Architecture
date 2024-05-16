package repository

import (
	"github.com/iqbalsiagian17/Service_News/model"
	"gorm.io/gorm"
)

type NewsRepository interface {
	InsertNews(news model.News) model.News
	UpdateNews(news model.News) model.News
	All() []model.News
	FindByID(newsID uint) model.News
	DeleteNews(news model.News)
}

type newsConnection struct {
	connection *gorm.DB
}

func NewNewsRepository(db *gorm.DB) NewsRepository {
	return &newsConnection{
		connection: db,
	}
}

func (db *newsConnection) InsertNews(news model.News) model.News {
	db.connection.Save(&news)
	return news
}

func (db *newsConnection) UpdateNews(news model.News) model.News {
	db.connection.Save(&news)
	return news
}

func (db *newsConnection) All() []model.News {
	var news []model.News
	db.connection.Find(&news)
	return news
}

func (db *newsConnection) FindByID(newsID uint) model.News {
	var news model.News
	db.connection.First(&news, newsID)
	return news
}

func (db *newsConnection) DeleteNews(news model.News) {
	db.connection.Delete(&news)
}
