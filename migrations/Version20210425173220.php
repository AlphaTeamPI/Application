<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425173220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, images VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY participant_id');
        $this->addSql('DROP INDEX participant_id ON produits');
        $this->addSql('ALTER TABLE produits CHANGE participant_id participant_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY produit_id');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY user_id');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY produit_id');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY user_id');
        $this->addSql('ALTER TABLE produits_user ADD PRIMARY KEY (produits_id, user_id)');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT FK_9044048BCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT FK_9044048BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX produit_id ON produits_user');
        $this->addSql('CREATE INDEX IDX_9044048BCD11A2CF ON produits_user (produits_id)');
        $this->addSql('DROP INDEX user_id ON produits_user');
        $this->addSql('CREATE INDEX IDX_9044048BA76ED395 ON produits_user (user_id)');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT produit_id FOREIGN KEY (produits_id) REFERENCES produits (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('ALTER TABLE produits CHANGE participant_id participant_id INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT participant_id FOREIGN KEY (participant_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX participant_id ON produits (participant_id)');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY FK_9044048BCD11A2CF');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY FK_9044048BA76ED395');
        $this->addSql('ALTER TABLE produits_user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY FK_9044048BCD11A2CF');
        $this->addSql('ALTER TABLE produits_user DROP FOREIGN KEY FK_9044048BA76ED395');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT produit_id FOREIGN KEY (produits_id) REFERENCES produits (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_9044048ba76ed395 ON produits_user');
        $this->addSql('CREATE INDEX user_id ON produits_user (user_id)');
        $this->addSql('DROP INDEX idx_9044048bcd11a2cf ON produits_user');
        $this->addSql('CREATE INDEX produit_id ON produits_user (produits_id)');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT FK_9044048BCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_user ADD CONSTRAINT FK_9044048BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }
}
