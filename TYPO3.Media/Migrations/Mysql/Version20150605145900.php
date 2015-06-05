<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Add property allowupscaling in typo3_media_domain_model_adjustment_abstractimageadjustment
 */
class Version20150605145900 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		$this->addSql("ALTER TABLE typo3_media_domain_model_adjustment_abstractimageadjustment ADD allowupscaling TINYINT(1) DEFAULT NULL");
		$this->addSql("ALTER TABLE typo3_media_domain_model_thumbnail ADD allowupscaling TINYINT(1) DEFAULT NULL");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		$this->addSql("ALTER TABLE typo3_media_domain_model_adjustment_abstractimageadjustment DROP allowupscaling");
		$this->addSql("ALTER TABLE typo3_media_domain_model_thumbnail DROP allowupscaling");
	}
}