package repository

import (
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/model"
	"gorm.io/gorm"
)

type JenisPenyakitRepository interface {
	InsertJenisPenyakit(jenisPenyakit model.JenisPenyakit) model.JenisPenyakit
	UpdateJenisPenyakit(jenisPenyakit model.JenisPenyakit) model.JenisPenyakit
	All() []model.JenisPenyakit
	FindByID(jenisPenyakitID uint) model.JenisPenyakit
	DeleteJenisPenyakit(jenisPenyakit model.JenisPenyakit)
}

type jenisPenyakitConnection struct {
	connection *gorm.DB
}

func NewJenisPenyakitRepository(db *gorm.DB) JenisPenyakitRepository {
	return &jenisPenyakitConnection{
		connection: db,
	}
}

func (db *jenisPenyakitConnection) InsertJenisPenyakit(jenisPenyakit model.JenisPenyakit) model.JenisPenyakit {
	db.connection.Save(&jenisPenyakit)
	return jenisPenyakit
}

func (db *jenisPenyakitConnection) UpdateJenisPenyakit(jenisPenyakit model.JenisPenyakit) model.JenisPenyakit {
	db.connection.Save(&jenisPenyakit)
	return jenisPenyakit
}

func (db *jenisPenyakitConnection) All() []model.JenisPenyakit {
	var jenisPenyakits []model.JenisPenyakit
	db.connection.Find(&jenisPenyakits)
	return jenisPenyakits
}

func (db *jenisPenyakitConnection) FindByID(jenisPenyakitID uint) model.JenisPenyakit {
	var jenisPenyakit model.JenisPenyakit
	db.connection.Find(&jenisPenyakit, jenisPenyakitID)
	return jenisPenyakit
}

func (db *jenisPenyakitConnection) DeleteJenisPenyakit(jenisPenyakit model.JenisPenyakit) {
	db.connection.Delete(&jenisPenyakit)
}
