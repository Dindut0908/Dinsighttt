export type Database = {
  public: {
    Tables: {
      abouts: {
        Row: {
          id: string;
          fullname: string | null;
          email: string | null;
          phone: string | null;
          education: string | null;
          address: string | null;
          description: string | null;
          photo: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          fullname?: string | null;
          email?: string | null;
          phone?: string | null;
          education?: string | null;
          address?: string | null;
          description?: string | null;
          photo?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          fullname?: string | null;
          email?: string | null;
          phone?: string | null;
          education?: string | null;
          address?: string | null;
          description?: string | null;
          photo?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
      blogs: {
        Row: {
          id: string;
          title: string;
          slug: string | null;
          content: string;
          thumbnail: string | null;
          excerpt: string | null;
          published_at: string | null;
          is_published: boolean;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          title: string;
          slug?: string | null;
          content: string;
          thumbnail?: string | null;
          excerpt?: string | null;
          published_at?: string | null;
          is_published?: boolean;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          title?: string;
          slug?: string | null;
          content?: string;
          thumbnail?: string | null;
          excerpt?: string | null;
          published_at?: string | null;
          is_published?: boolean;
          created_at?: string;
          updated_at?: string;
        };
      };
      certificates: {
        Row: {
          id: string;
          name: string;
          issuer: string;
          issued_date: string | null;
          image: string | null;
          credential_url: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          name: string;
          issuer: string;
          issued_date?: string | null;
          image?: string | null;
          credential_url?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          name?: string;
          issuer?: string;
          issued_date?: string | null;
          image?: string | null;
          credential_url?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
      education: {
        Row: {
          id: string;
          school: string;
          major: string;
          year: string;
          description: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          school: string;
          major: string;
          year: string;
          description?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          school?: string;
          major?: string;
          year?: string;
          description?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
      experiences: {
        Row: {
          id: string;
          position: string;
          organization: string;
          period: string;
          description: string | null;
          image: string | null;
          is_active: boolean;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          position: string;
          organization: string;
          period: string;
          description?: string | null;
          image?: string | null;
          is_active?: boolean;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          position?: string;
          organization?: string;
          period?: string;
          description?: string | null;
          image?: string | null;
          is_active?: boolean;
          created_at?: string;
          updated_at?: string;
        };
      };
      guestbooks: {
        Row: {
          id: string;
          name: string;
          email: string | null;
          message: string;
          is_approved: boolean;
          ip_address: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          name: string;
          email?: string | null;
          message: string;
          is_approved?: boolean;
          ip_address?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          name?: string;
          email?: string | null;
          message?: string;
          is_approved?: boolean;
          ip_address?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
      homes: {
        Row: {
          id: string;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          created_at?: string;
          updated_at?: string;
        };
      };
      projects: {
        Row: {
          id: string;
          title: string;
          slug: string | null;
          description: string;
          image: string | null;
          demo_link: string | null;
          repo_link: string | null;
          tech_stack: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          title: string;
          slug?: string | null;
          description: string;
          image?: string | null;
          demo_link?: string | null;
          repo_link?: string | null;
          tech_stack?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          title?: string;
          slug?: string | null;
          description?: string;
          image?: string | null;
          demo_link?: string | null;
          repo_link?: string | null;
          tech_stack?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
      profiles: {
        Row: {
          id: string;
          name: string | null;
          email: string | null;
          avatar_url: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id: string;
          name?: string | null;
          email?: string | null;
          avatar_url?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          name?: string | null;
          email?: string | null;
          avatar_url?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
      skills: {
        Row: {
          id: string;
          title: string;
          icon: string | null;
          percentage: number;
          category: string | null;
          created_at: string;
          updated_at: string;
        };
        Insert: {
          id?: string;
          title: string;
          icon?: string | null;
          percentage?: number;
          category?: string | null;
          created_at?: string;
          updated_at?: string;
        };
        Update: {
          id?: string;
          title?: string;
          icon?: string | null;
          percentage?: number;
          category?: string | null;
          created_at?: string;
          updated_at?: string;
        };
      };
    };
    Views: {
      [_ in never]: never;
    };
    Functions: {
      [_ in never]: never;
    };
    Enums: {
      [_ in never]: never;
    };
    CompositeTypes: {
      [_ in never]: never;
    };
  };
};
