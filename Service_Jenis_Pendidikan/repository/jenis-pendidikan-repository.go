package repository

import (
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/model"
	"gorm.io/gorm"
)

type JenisPendidikanRepository interface {
	InsertJenisPendidikan(jenisPendidikan model.JenisPendidikan) model.JenisPendidikan
	UpdateJenisPendidikan(jenisPendidikan model.JenisPendidikan) model.JenisPendidikan
	All() []model.JenisPendidikan
	FindByID(jenisPendidikanID uint) model.JenisPendidikan
	DeleteJenisPendidikan(jenisPendidikan model.JenisPendidikan)
}

type jenisPendidikanConnection struct {
	connection *gorm.DB
}

func NewJenisPendidikanRepository(db *gorm.DB) JenisPendidikanRepository {
	return &jenisPendidikanConnection{
		connection: db,
	}
}

func (db *jenisPendidikanConnection) InsertJenisPendidikan(jenisPendidikan model.JenisPendidikan) model.JenisPendidikan {
	db.connection.Save(&jenisPendidikan)
	return jenisPendidikan
}

func (db *jenisPendidikanConnection) UpdateJenisPendidikan(jenisPendidikan model.JenisPendidikan) model.JenisPendidikan {
	db.connection.Save(&jenisPendidikan)
	return jenisPendidikan
}

func (db *jenisPendidikanConnection) All() []model.JenisPendidikan {
	var jenisPendidikans []model.JenisPendidikan
	db.connection.Find(&jenisPendidikans)
	return jenisPendidikans
}

func (db *jenisPendidikanConnection) FindByID(jenisPendidikanID uint) model.JenisPendidikan {
	var jenisPendidikan model.JenisPendidikan
	db.connection.Find(&jenisPendidikan, jenisPendidikanID)
	return jenisPendidikan
}

func (db *jenisPendidikanConnection) DeleteJenisPendidikan(jenisPendidikan model.JenisPendidikan) {
	db.connection.Delete(&jenisPendidikan)
}
