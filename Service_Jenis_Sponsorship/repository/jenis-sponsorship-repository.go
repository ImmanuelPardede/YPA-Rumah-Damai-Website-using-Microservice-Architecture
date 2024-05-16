package repository

import (
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/model"
	"gorm.io/gorm"
)

type JenisSponsorshipRepository interface {
	InsertJenisSponsorship(jenisSponsorship model.JenisSponsorship) model.JenisSponsorship
	UpdateJenisSponsorship(jenisSponsorship model.JenisSponsorship) model.JenisSponsorship
	All() []model.JenisSponsorship
	FindByID(jenisSponsorshipID uint) model.JenisSponsorship
	DeleteJenisSponsorship(jenisSponsorship model.JenisSponsorship)
}

type jenisSponsorshipConnection struct {
	connection *gorm.DB
}

func NewJenisSponsorshipRepository(db *gorm.DB) JenisSponsorshipRepository {
	return &jenisSponsorshipConnection{
		connection: db,
	}
}

func (db *jenisSponsorshipConnection) InsertJenisSponsorship(jenisSponsorship model.JenisSponsorship) model.JenisSponsorship {
	db.connection.Save(&jenisSponsorship)
	return jenisSponsorship
}

func (db *jenisSponsorshipConnection) UpdateJenisSponsorship(jenisSponsorship model.JenisSponsorship) model.JenisSponsorship {
	db.connection.Save(&jenisSponsorship)
	return jenisSponsorship
}

func (db *jenisSponsorshipConnection) All() []model.JenisSponsorship {
	var jenisSponsorships []model.JenisSponsorship
	db.connection.Find(&jenisSponsorships)
	return jenisSponsorships
}

func (db *jenisSponsorshipConnection) FindByID(jenisSponsorshipID uint) model.JenisSponsorship {
	var jenisSponsorship model.JenisSponsorship
	db.connection.Find(&jenisSponsorship, jenisSponsorshipID)
	return jenisSponsorship
}

func (db *jenisSponsorshipConnection) DeleteJenisSponsorship(jenisSponsorship model.JenisSponsorship) {
	db.connection.Delete(&jenisSponsorship)
}
