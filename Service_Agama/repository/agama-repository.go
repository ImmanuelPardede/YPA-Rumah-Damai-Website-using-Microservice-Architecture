package repository

import (
	"github.com/iqbalsiagian17/Service_Agama/model"
	"gorm.io/gorm"
)

type AgamaRepository interface {
	InsertAgama(agama model.Agama) model.Agama
	UpdateAgama(agama model.Agama) model.Agama
	All() []model.Agama
	FindByID(agamaID uint) model.Agama
	DeleteAgama(agama model.Agama)
}

type agamaConnection struct {
	connection *gorm.DB
}

func NewAgamaRepository(db *gorm.DB) AgamaRepository {
	return &agamaConnection{
		connection: db,
	}
}

func (db *agamaConnection) InsertAgama(agama model.Agama) model.Agama {
	db.connection.Save(&agama)
	return agama
}

func (db *agamaConnection) UpdateAgama(agama model.Agama) model.Agama {
	db.connection.Save(&agama)
	return agama
}

func (db *agamaConnection) All() []model.Agama {
	var agamas []model.Agama
	db.connection.Find(&agamas)
	return agamas
}

func (db *agamaConnection) FindByID(agamaID uint) model.Agama {
	var agama model.Agama
	db.connection.Find(&agama, agamaID)
	return agama
}

func (db *agamaConnection) DeleteAgama(agama model.Agama) {
	db.connection.Delete(&agama)
}
