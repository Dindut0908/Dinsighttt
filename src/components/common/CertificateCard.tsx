import { getPublicUrl } from '../../hooks/useStorage';
import { ArrowUpRightFromSquare } from 'lucide-react';
import type { Certificate } from '../../hooks/useCertificates';
import { format } from 'date-fns';

interface CertificateCardProps {
  certificate: Certificate;
}

const CertificateCard = ({ certificate }: CertificateCardProps) => {
  const imageUrl = getPublicUrl(certificate.image);
  const issuedDate = certificate.issued_date ? format(new Date(certificate.issued_date), 'd MMM yyyy') : '-';

  return (
    <div className="group overflow-hidden rounded-3xl bg-white dark:bg-[#111827] border border-slate-200 dark:border-white/10 shadow-xl transition duration-700 hover:-translate-y-4 hover:shadow-2xl">
      <div className="relative overflow-hidden aspect-[4/3] bg-slate-100 dark:bg-white/5">
        {imageUrl ? (
          <img src={imageUrl} alt={certificate.name} className="w-full h-full object-cover transition duration-700 group-hover:scale-105" />
        ) : (
          <div className="w-full h-full flex items-center justify-center text-slate-400 text-5xl">
            <i className="fa-solid fa-certificate" aria-hidden="true" />
          </div>
        )}
      </div>
      <div className="p-6">
        <p className="text-xs text-cyan-500 font-bold tracking-wider uppercase mb-1">{certificate.issuer}</p>
        <h3 className="text-lg font-bold text-slate-900 dark:text-white line-clamp-2">{certificate.name}</h3>
        <p className="mt-2 text-sm text-slate-500 dark:text-slate-400">
          <i className="fa-regular fa-calendar mr-1" /> {issuedDate}
        </p>
        {certificate.credential_url && (
          <a href={certificate.credential_url} target="_blank" rel="noopener noreferrer" className="mt-4 inline-flex items-center gap-1 text-sm text-cyan-500 font-semibold hover:gap-2 transition">
            Verifikasi <ArrowUpRightFromSquare className="w-3 h-3" />
          </a>
        )}
      </div>
    </div>
  );
};

export default CertificateCard;
