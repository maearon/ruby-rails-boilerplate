module TypeValidatable
  extend ActiveSupport::Concern

  STRING_LEN_MAX = 255
  TEXT_LEN_MAX = 2000
  INTEGER_MAX = 1_000_000_000
  STRING_VALIDATION = { length: { maximum: STRING_LEN_MAX } }.freeze
  TEXT_VALIDATION = { length: { maximum: TEXT_LEN_MAX } }.freeze
  VALID_EMAIL_REGEX = /\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i

  class_methods do
    def validates_by_type(type:, opt:, only: nil, except: nil)
      column_names = columns_by_type(type)
      inclusions = Array(only)
      column_names.select! { |name| inclusions.include?(name) } if inclusions.present?
      exclusions = Array(except)
      column_names.select! { |name| exclusions.exclude?(name) } if exclusions.present?

      validates(*column_names, **opt)
    end

    private

    def columns_by_type(type)
      raise 'type error' unless %i[string text integer decimal].include?(type)

      columns.filter { |col| col.type == type }.map(&:name).map(&:to_sym)
    end
  end
end
