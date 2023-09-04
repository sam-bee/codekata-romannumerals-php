Feature: Converting Roman numerals
  In order to interpret Roman numerals
  As a user of the CLI app
  I want to convert Roman to Arabic numerals.


  @critical
  Scenario: Converting any number
    Given my Roman numerals are 'I'
    When I convert it to arabic numerals
    Then I should get '1'


  Scenario: Converting a harder number
    Given my Roman numerals are 'MCMXCVII'
    When I convert it to arabic numerals
    Then I should get '1997'
