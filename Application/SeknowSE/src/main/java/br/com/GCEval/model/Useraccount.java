package br.com.GCEval.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import java.io.Serializable;
import java.util.Date;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

@Entity
@Table(name = "useraccount")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Useraccount.findAll", query = "SELECT u FROM Useraccount u"),
    @NamedQuery(name = "Useraccount.findByIdUserAccount", query = "SELECT u FROM Useraccount u WHERE u.idUserAccount = :idUserAccount"),
    @NamedQuery(name = "Useraccount.findByNome", query = "SELECT u FROM Useraccount u WHERE u.nome = :nome"),
    @NamedQuery(name = "Useraccount.findByEmail", query = "SELECT u FROM Useraccount u WHERE u.email = :email"),
    @NamedQuery(name = "Useraccount.findByPassword", query = "SELECT u FROM Useraccount u WHERE u.password = :password"),
    @NamedQuery(name = "Useraccount.findByPhone", query = "SELECT u FROM Useraccount u WHERE u.phone = :phone"),
    @NamedQuery(name = "Useraccount.findByActive", query = "SELECT u FROM Useraccount u WHERE u.active = :active"),
    @NamedQuery(name = "Useraccount.findByBirthDate", query = "SELECT u FROM Useraccount u WHERE u.birthDate = :birthDate"),
    @NamedQuery(name = "Useraccount.findByStartWork", query = "SELECT u FROM Useraccount u WHERE u.startWork = :startWork")})
public class Useraccount implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idUserAccount")
    private Integer idUserAccount;
    @Size(max = 200)
    @Column(name = "nome")
    private String nome;
    // @Pattern(regexp="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?", message="E-mail inválido")//if the field contains email address consider using this annotation to enforce field validation
    @Size(max = 80)
    @Column(name = "email")
    private String email;
    @Size(max = 100)
    @Column(name = "password")
    private String password;
    // @Pattern(regexp="^\\(?(\\d{3})\\)?[- ]?(\\d{3})[- ]?(\\d{4})$", message="Formato de telefone/fax inválido, deve ser xxx-xxx-xxxx")//if the field contains phone or fax number consider using this annotation to enforce field validation
    @Size(max = 45)
    @Column(name = "phone")
    private String phone;
    @Column(name = "active")
    private Short active;
    @Column(name = "birthDate")
    @Temporal(TemporalType.DATE)
    private Date birthDate;
    @Column(name = "startWork")
    @Temporal(TemporalType.DATE)
    private Date startWork;
    @Column(name = "gender")
    private String gender;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "owner")
    @JsonIgnore
    private List<Company> companyList;
    @JoinColumn(name = "company_id", referencedColumnName = "idCompany")
    @ManyToOne
    private Company companyId;
    @JoinColumn(name = "Grouping", referencedColumnName = "idGroup")
    @ManyToOne(optional = false)
    private Grouping grouping;
    @JoinColumn(name = "UserType", referencedColumnName = "idUserType")
    @ManyToOne(optional = false)
    private Usertype userType;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "userAccount")
    @JsonIgnore
    private List<Answerdata> answerdataList;

    public Useraccount() {
    }

    public Useraccount(Integer idUserAccount) {
        this.idUserAccount = idUserAccount;
    }

    public Integer getIdUserAccount() {
        return idUserAccount;
    }

    public void setIdUserAccount(Integer idUserAccount) {
        this.idUserAccount = idUserAccount;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public Short getActive() {
        return active;
    }

    public void setActive(Short active) {
        this.active = active;
    }

    public Date getBirthDate() {
        return birthDate;
    }

    public void setBirthDate(Date birthDate) {
        this.birthDate = birthDate;
    }

    public Date getStartWork() {
        return startWork;
    }

    public void setStartWork(Date startWork) {
        this.startWork = startWork;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    @XmlTransient
    public List<Company> getCompanyList() {
        return companyList;
    }

    public void setCompanyList(List<Company> companyList) {
        this.companyList = companyList;
    }

    public Company getCompanyId() {
        return companyId;
    }

    public void setCompanyId(Company companyId) {
        this.companyId = companyId;
    }

    public Grouping getGrouping() {
        return grouping;
    }

    public void setGrouping(Grouping grouping) {
        this.grouping = grouping;
    }

    public Usertype getUserType() {
        return userType;
    }

    public void setUserType(Usertype userType) {
        this.userType = userType;
    }

    @XmlTransient
    public List<Answerdata> getAnswerdataList() {
        return answerdataList;
    }

    public void setAnswerdataList(List<Answerdata> answerdataList) {
        this.answerdataList = answerdataList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idUserAccount != null ? idUserAccount.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Useraccount)) {
            return false;
        }
        Useraccount other = (Useraccount) object;
        if ((this.idUserAccount == null && other.idUserAccount != null) || (this.idUserAccount != null && !this.idUserAccount.equals(other.idUserAccount))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Useraccount{" + "nome=" + nome + '}';
    }
    
    

}
