package repository

import (
	"github.com/iqbalsiagian17/Service_Visitor_History/model"
	"gorm.io/gorm"
)

type HistoryRepository interface {
	InsertHistory(history model.History) model.History
	UpdateHistory(history model.History) model.History
	All() []model.History
	FindByID(historyID uint) model.History
	DeleteHistory(history model.History)
}

type historyConnection struct {
	connection *gorm.DB
}

func NewHistoryRepository(db *gorm.DB) HistoryRepository {
	return &historyConnection{
		connection: db,
	}
}

func (db *historyConnection) InsertHistory(history model.History) model.History {
	db.connection.Save(&history)
	return history
}

func (db *historyConnection) UpdateHistory(history model.History) model.History {
	db.connection.Save(&history)
	return history
}

func (db *historyConnection) All() []model.History {
	var historys []model.History
	db.connection.Find(&historys)
	return historys
}

func (db *historyConnection) FindByID(historyID uint) model.History {
	var history model.History
	db.connection.Find(&history, historyID)
	return history
}

func (db *historyConnection) DeleteHistory(history model.History) {
	db.connection.Delete(&history)
}
