package model

import (
	"gorm.io/gorm"
)

type JenisDisabilitas struct {
	gorm.Model
	KategoriDisabilitas string `gorm:"type:varchar(255)" json:"kategori_disabilitas"`
	JenisDisabilitas    string `gorm:"type:varchar(255)" json:"jenis_disabilitas"`
	Deskripsi           string `gorm:"type:varchar(255)" json:"deskripsi"`
}
