<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220408100054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campaign (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, game_id INT NOT NULL, name VARCHAR(120) NOT NULL, description TEXT NOT NULL, INDEX IDX_1F1512DD7E3C61F9 (owner_id), INDEX IDX_1F1512DDE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(100) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_advantage (id INT AUTO_INCREMENT NOT NULL, advantage_category_id INT NOT NULL, name VARCHAR(120) NOT NULL, multiselect TINYINT(1) NOT NULL, buyable TINYINT(1) NOT NULL, initial_cost INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_5E6FF7B63E248A36 (advantage_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_advantage_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_age (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, start_att_value1 INT NOT NULL, start_att_value2 INT NOT NULL, start_att_value3 INT NOT NULL, start_att_value4 INT NOT NULL, INDEX IDX_44A3C1D3F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_armor (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, weight INT NOT NULL, create_difficulty INT NOT NULL, construction_time INT NOT NULL, village_rarety VARCHAR(255) NOT NULL, city_rarety VARCHAR(255) NOT NULL, village_price INT NOT NULL, city_price INT NOT NULL, protection INT NOT NULL, move_penalty INT NOT NULL, material VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_3215A3CBF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_armor_category (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_4A883494F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_benefit (id INT AUTO_INCREMENT NOT NULL, caste_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(120) NOT NULL, INDEX IDX_D956005029B1D13 (caste_id), INDEX IDX_D9560050F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_caracteristic (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(3) NOT NULL, min_value INT NOT NULL, maximum_value INT NOT NULL, xp_increase INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_565B83D2F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_caste (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_3624C8FDF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_currency (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, factor_value INT NOT NULL, available TINYINT(1) NOT NULL, display TINYINT(1) NOT NULL, code VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_8FB0093EF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_disadvantage (id INT AUTO_INCREMENT NOT NULL, advantage_category_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, multiselect TINYINT(1) NOT NULL, buyable TINYINT(1) NOT NULL, initial_cost INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_B0E737C43E248A36 (advantage_category_id), INDEX IDX_B0E737C4F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_discipline (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, min_value INT NOT NULL, maximum_value INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_F61A8A2EF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_favour (id INT AUTO_INCREMENT NOT NULL, caste_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(120) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_92916AB529B1D13 (caste_id), INDEX IDX_92916AB5F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_figure (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, campaign_id INT NOT NULL, name VARCHAR(120) NOT NULL, INDEX IDX_976724287E3C61F9 (owner_id), INDEX IDX_97672428F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_injuryold (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_major_attribute (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, min_value INT NOT NULL, maximum_value INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_C36238A6F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_minor_attribute (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, min_value INT NOT NULL, maximum_value INT NOT NULL, description LONGTEXT NOT NULL, xp_increase INT NOT NULL, INDEX IDX_30824C06F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_nation (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, display TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_746AFA75F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_omen (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, personnality VARCHAR(255) NOT NULL, motivation VARCHAR(255) NOT NULL, quality VARCHAR(255) NOT NULL, fault VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_prohibited (id INT AUTO_INCREMENT NOT NULL, caste_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(70) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_722AEA2029B1D13 (caste_id), INDEX IDX_722AEA20F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_shield (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, weight INT NOT NULL, create_difficulty INT NOT NULL, construction_time INT NOT NULL, village_rarety VARCHAR(255) NOT NULL, city_rarety VARCHAR(255) NOT NULL, village_price INT NOT NULL, city_price INT NOT NULL, protection INT NOT NULL, move_penalty INT NOT NULL, material VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_A6A345BAF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_skill (id INT AUTO_INCREMENT NOT NULL, skill_category_id INT DEFAULT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, xp_increase INT NOT NULL, cost INT NOT NULL, reserved TINYINT(1) NOT NULL, free TINYINT(1) NOT NULL, forbidden TINYINT(1) NOT NULL, maximum_value INT NOT NULL, min_value INT NOT NULL, available TINYINT(1) NOT NULL, display TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D30FB940AC58042E (skill_category_id), INDEX IDX_D30FB940F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_skill_category (id INT AUTO_INCREMENT NOT NULL, major_attribute_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_5D458C42B4B49857 (major_attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_status (id INT AUTO_INCREMENT NOT NULL, caste_id INT NOT NULL, technic_id INT NOT NULL, benefit_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, level INT NOT NULL, description TINYTEXT NOT NULL, INDEX IDX_C330F24E29B1D13 (caste_id), INDEX IDX_C330F24EFAAE137C (technic_id), INDEX IDX_C330F24EB517B89 (benefit_id), INDEX IDX_C330F24EF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_technic (id INT AUTO_INCREMENT NOT NULL, caste_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(70) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_5A6261B729B1D13 (caste_id), INDEX IDX_5A6261B7F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_tendency (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, max_circles INT NOT NULL, min_circles INT NOT NULL, min_value INT NOT NULL, maximum_value INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_5A40D00F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_weapon (id INT AUTO_INCREMENT NOT NULL, carac_requirement1_id INT DEFAULT NULL, carac_requirement2_id INT DEFAULT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, weight INT NOT NULL, creation_difficulty INT NOT NULL, construction_delay INT NOT NULL, village_rarety VARCHAR(255) NOT NULL, city_rarety VARCHAR(255) NOT NULL, village_price INT NOT NULL, city_price INT NOT NULL, value_requirement1 INT DEFAULT NULL, value_requirement2 INT DEFAULT NULL, melee_initiative INT NOT NULL, contact_initiative INT NOT NULL, special VARCHAR(255) NOT NULL, damages VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D10330B4BEDA033C (carac_requirement1_id), INDEX IDX_D10330B4AC6FACD2 (carac_requirement2_id), INDEX IDX_D10330B4F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prophecy_weapon_category (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_50434B5AF639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, campaign_id INT DEFAULT NULL, discipline_id INT NOT NULL, sphere_id INT NOT NULL, name VARCHAR(180) NOT NULL, level INT NOT NULL, complexity INT NOT NULL, cost INT NOT NULL, casting_time VARCHAR(30) NOT NULL, difficulty INT NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_D03FCD8D5E237E06 (name), INDEX IDX_D03FCD8DF639F774 (campaign_id), INDEX IDX_D03FCD8DA5522701 (discipline_id), INDEX IDX_D03FCD8D75FD4EF9 (sphere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sphere (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, bla INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, username VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campaign ADD CONSTRAINT FK_1F1512DD7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE campaign ADD CONSTRAINT FK_1F1512DDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE prophecy_advantage ADD CONSTRAINT FK_5E6FF7B63E248A36 FOREIGN KEY (advantage_category_id) REFERENCES prophecy_advantage_category (id)');
        $this->addSql('ALTER TABLE prophecy_age ADD CONSTRAINT FK_44A3C1D3F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_armor ADD CONSTRAINT FK_3215A3CBF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_armor_category ADD CONSTRAINT FK_4A883494F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_benefit ADD CONSTRAINT FK_D956005029B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('ALTER TABLE prophecy_benefit ADD CONSTRAINT FK_D9560050F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_caracteristic ADD CONSTRAINT FK_565B83D2F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_caste ADD CONSTRAINT FK_3624C8FDF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_currency ADD CONSTRAINT FK_8FB0093EF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_disadvantage ADD CONSTRAINT FK_B0E737C43E248A36 FOREIGN KEY (advantage_category_id) REFERENCES prophecy_advantage_category (id)');
        $this->addSql('ALTER TABLE prophecy_disadvantage ADD CONSTRAINT FK_B0E737C4F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_discipline ADD CONSTRAINT FK_F61A8A2EF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_favour ADD CONSTRAINT FK_92916AB529B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('ALTER TABLE prophecy_favour ADD CONSTRAINT FK_92916AB5F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_figure ADD CONSTRAINT FK_976724287E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prophecy_figure ADD CONSTRAINT FK_97672428F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_major_attribute ADD CONSTRAINT FK_C36238A6F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_minor_attribute ADD CONSTRAINT FK_30824C06F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_nation ADD CONSTRAINT FK_746AFA75F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_prohibited ADD CONSTRAINT FK_722AEA2029B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('ALTER TABLE prophecy_prohibited ADD CONSTRAINT FK_722AEA20F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_shield ADD CONSTRAINT FK_A6A345BAF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_skill ADD CONSTRAINT FK_D30FB940AC58042E FOREIGN KEY (skill_category_id) REFERENCES prophecy_skill_category (id)');
        $this->addSql('ALTER TABLE prophecy_skill ADD CONSTRAINT FK_D30FB940F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_skill_category ADD CONSTRAINT FK_5D458C42B4B49857 FOREIGN KEY (major_attribute_id) REFERENCES prophecy_major_attribute (id)');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24E29B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EFAAE137C FOREIGN KEY (technic_id) REFERENCES prophecy_technic (id)');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EB517B89 FOREIGN KEY (benefit_id) REFERENCES prophecy_benefit (id)');
        $this->addSql('ALTER TABLE prophecy_status ADD CONSTRAINT FK_C330F24EF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_technic ADD CONSTRAINT FK_5A6261B729B1D13 FOREIGN KEY (caste_id) REFERENCES prophecy_caste (id)');
        $this->addSql('ALTER TABLE prophecy_technic ADD CONSTRAINT FK_5A6261B7F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_tendency ADD CONSTRAINT FK_5A40D00F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_weapon ADD CONSTRAINT FK_D10330B4BEDA033C FOREIGN KEY (carac_requirement1_id) REFERENCES prophecy_caracteristic (id)');
        $this->addSql('ALTER TABLE prophecy_weapon ADD CONSTRAINT FK_D10330B4AC6FACD2 FOREIGN KEY (carac_requirement2_id) REFERENCES prophecy_caracteristic (id)');
        $this->addSql('ALTER TABLE prophecy_weapon ADD CONSTRAINT FK_D10330B4F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE prophecy_weapon_category ADD CONSTRAINT FK_50434B5AF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DF639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DA5522701 FOREIGN KEY (discipline_id) REFERENCES prophecy_discipline (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D75FD4EF9 FOREIGN KEY (sphere_id) REFERENCES sphere (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prophecy_age DROP FOREIGN KEY FK_44A3C1D3F639F774');
        $this->addSql('ALTER TABLE prophecy_armor DROP FOREIGN KEY FK_3215A3CBF639F774');
        $this->addSql('ALTER TABLE prophecy_armor_category DROP FOREIGN KEY FK_4A883494F639F774');
        $this->addSql('ALTER TABLE prophecy_benefit DROP FOREIGN KEY FK_D9560050F639F774');
        $this->addSql('ALTER TABLE prophecy_caracteristic DROP FOREIGN KEY FK_565B83D2F639F774');
        $this->addSql('ALTER TABLE prophecy_caste DROP FOREIGN KEY FK_3624C8FDF639F774');
        $this->addSql('ALTER TABLE prophecy_currency DROP FOREIGN KEY FK_8FB0093EF639F774');
        $this->addSql('ALTER TABLE prophecy_disadvantage DROP FOREIGN KEY FK_B0E737C4F639F774');
        $this->addSql('ALTER TABLE prophecy_discipline DROP FOREIGN KEY FK_F61A8A2EF639F774');
        $this->addSql('ALTER TABLE prophecy_favour DROP FOREIGN KEY FK_92916AB5F639F774');
        $this->addSql('ALTER TABLE prophecy_figure DROP FOREIGN KEY FK_97672428F639F774');
        $this->addSql('ALTER TABLE prophecy_major_attribute DROP FOREIGN KEY FK_C36238A6F639F774');
        $this->addSql('ALTER TABLE prophecy_minor_attribute DROP FOREIGN KEY FK_30824C06F639F774');
        $this->addSql('ALTER TABLE prophecy_nation DROP FOREIGN KEY FK_746AFA75F639F774');
        $this->addSql('ALTER TABLE prophecy_prohibited DROP FOREIGN KEY FK_722AEA20F639F774');
        $this->addSql('ALTER TABLE prophecy_shield DROP FOREIGN KEY FK_A6A345BAF639F774');
        $this->addSql('ALTER TABLE prophecy_skill DROP FOREIGN KEY FK_D30FB940F639F774');
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EF639F774');
        $this->addSql('ALTER TABLE prophecy_technic DROP FOREIGN KEY FK_5A6261B7F639F774');
        $this->addSql('ALTER TABLE prophecy_tendency DROP FOREIGN KEY FK_5A40D00F639F774');
        $this->addSql('ALTER TABLE prophecy_weapon DROP FOREIGN KEY FK_D10330B4F639F774');
        $this->addSql('ALTER TABLE prophecy_weapon_category DROP FOREIGN KEY FK_50434B5AF639F774');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DF639F774');
        $this->addSql('ALTER TABLE campaign DROP FOREIGN KEY FK_1F1512DDE48FD905');
        $this->addSql('ALTER TABLE prophecy_advantage DROP FOREIGN KEY FK_5E6FF7B63E248A36');
        $this->addSql('ALTER TABLE prophecy_disadvantage DROP FOREIGN KEY FK_B0E737C43E248A36');
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EB517B89');
        $this->addSql('ALTER TABLE prophecy_weapon DROP FOREIGN KEY FK_D10330B4BEDA033C');
        $this->addSql('ALTER TABLE prophecy_weapon DROP FOREIGN KEY FK_D10330B4AC6FACD2');
        $this->addSql('ALTER TABLE prophecy_benefit DROP FOREIGN KEY FK_D956005029B1D13');
        $this->addSql('ALTER TABLE prophecy_favour DROP FOREIGN KEY FK_92916AB529B1D13');
        $this->addSql('ALTER TABLE prophecy_prohibited DROP FOREIGN KEY FK_722AEA2029B1D13');
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24E29B1D13');
        $this->addSql('ALTER TABLE prophecy_technic DROP FOREIGN KEY FK_5A6261B729B1D13');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DA5522701');
        $this->addSql('ALTER TABLE prophecy_skill_category DROP FOREIGN KEY FK_5D458C42B4B49857');
        $this->addSql('ALTER TABLE prophecy_skill DROP FOREIGN KEY FK_D30FB940AC58042E');
        $this->addSql('ALTER TABLE prophecy_status DROP FOREIGN KEY FK_C330F24EFAAE137C');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D75FD4EF9');
        $this->addSql('ALTER TABLE campaign DROP FOREIGN KEY FK_1F1512DD7E3C61F9');
        $this->addSql('ALTER TABLE prophecy_figure DROP FOREIGN KEY FK_976724287E3C61F9');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE prophecy_advantage');
        $this->addSql('DROP TABLE prophecy_advantage_category');
        $this->addSql('DROP TABLE prophecy_age');
        $this->addSql('DROP TABLE prophecy_armor');
        $this->addSql('DROP TABLE prophecy_armor_category');
        $this->addSql('DROP TABLE prophecy_benefit');
        $this->addSql('DROP TABLE prophecy_caracteristic');
        $this->addSql('DROP TABLE prophecy_caste');
        $this->addSql('DROP TABLE prophecy_currency');
        $this->addSql('DROP TABLE prophecy_disadvantage');
        $this->addSql('DROP TABLE prophecy_discipline');
        $this->addSql('DROP TABLE prophecy_favour');
        $this->addSql('DROP TABLE prophecy_figure');
        $this->addSql('DROP TABLE prophecy_injuryold');
        $this->addSql('DROP TABLE prophecy_major_attribute');
        $this->addSql('DROP TABLE prophecy_minor_attribute');
        $this->addSql('DROP TABLE prophecy_nation');
        $this->addSql('DROP TABLE prophecy_omen');
        $this->addSql('DROP TABLE prophecy_prohibited');
        $this->addSql('DROP TABLE prophecy_shield');
        $this->addSql('DROP TABLE prophecy_skill');
        $this->addSql('DROP TABLE prophecy_skill_category');
        $this->addSql('DROP TABLE prophecy_status');
        $this->addSql('DROP TABLE prophecy_technic');
        $this->addSql('DROP TABLE prophecy_tendency');
        $this->addSql('DROP TABLE prophecy_weapon');
        $this->addSql('DROP TABLE prophecy_weapon_category');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE sphere');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user');
    }
}
