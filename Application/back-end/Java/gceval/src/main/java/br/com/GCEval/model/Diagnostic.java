package br.com.GCEval.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import java.io.Serializable;
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
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;


@Entity
@Table(name = "diagnostic")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Diagnostic.findAll", query = "SELECT d FROM Diagnostic d"),
    @NamedQuery(name = "Diagnostic.findByIdquestionnaire", query = "SELECT d FROM Diagnostic d WHERE d.idquestionnaire = :idquestionnaire"),
    @NamedQuery(name = "Diagnostic.findByName", query = "SELECT d FROM Diagnostic d WHERE d.name = :name"),
    @NamedQuery(name = "Diagnostic.findByDescription", query = "SELECT d FROM Diagnostic d WHERE d.description = :description")})
public class Diagnostic implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idquestionnaire")
    private Integer idquestionnaire;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 150)
    @Column(name = "name")
    private String name;
    @Size(max = 350)
    @Column(name = "Description")
    private String description;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "diagnostic")
    @JsonIgnore
    private List<Section> sectionList;
    @JoinColumn(name = "UserAccount", referencedColumnName = "idUserAccount")
    @ManyToOne(optional = false)
    @JsonIgnore
    private Useraccount userAccount;

    public Diagnostic() {
    }

    public Diagnostic(Integer idquestionnaire) {
        this.idquestionnaire = idquestionnaire;
    }

    public Diagnostic(Integer idquestionnaire, String name) {
        this.idquestionnaire = idquestionnaire;
        this.name = name;
    }

    public Integer getIdquestionnaire() {
        return idquestionnaire;
    }

    public void setIdquestionnaire(Integer idquestionnaire) {
        this.idquestionnaire = idquestionnaire;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    @XmlTransient
    public List<Section> getSectionList() {
        return sectionList;
    }

    public void setSectionList(List<Section> sectionList) {
        this.sectionList = sectionList;
    }

    public Useraccount getUserAccount() {
        return userAccount;
    }

    public void setUserAccount(Useraccount userAccount) {
        this.userAccount = userAccount;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idquestionnaire != null ? idquestionnaire.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Diagnostic)) {
            return false;
        }
        Diagnostic other = (Diagnostic) object;
        if ((this.idquestionnaire == null && other.idquestionnaire != null) || (this.idquestionnaire != null && !this.idquestionnaire.equals(other.idquestionnaire))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.com.GCEval.model.Diagnostic[ idquestionnaire=" + idquestionnaire + " ]";
    }
    
}
